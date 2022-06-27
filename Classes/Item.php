<?php
class Item {
    protected $item_id;
    protected $brand_fk;
    protected $item;
    protected $resume;
    protected $price;
    protected $description;
    protected $image;
    protected $image_title;
    protected $stock;

    public function all(): array {
        $db = (new DBConnection())->getConnection();
        $query = "SELECT * FROM items";

        $stmt = $db->prepare($query);
        $stmt->execute();

        // setFetchMode returns data as instance of Item.
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        return $stmt->fetchAll();
    }

    public function getItemById(int $id): ?Item {
        $db = (new DBConnection())->getConnection();
        // holders to prevent SQL injection.
        $query = "SELECT * FROM items
                  WHERE item_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);

        $item = $stmt->fetch();
        if (!$item) {
            return null;
        }
        return $item;
    }

    // create item in database
    // if error throws PDOException
    public function create(array $data) {
        $db = (new DBConnection())->getConnection();
        $query = "INSERT INTO items (user_fk, brand_fk, item, resume, price, 
                  description, image, image_title, stock) 
                  VALUES(:user_fk, :brand_fk, :item, :resume, :price,:description,
                  :image, :image_title, :stock);";

        $stmt = $db->prepare($query);
        $stmt->execute([
            'user_fk'     => $data['user_fk'],
            'brand_fk'    => $data['brand_fk'],
            'item'        => $data['item'],
            'resume'      => $data['resume'],
            'price'       => $data['price'],
            'description' => $data['description'],
            'image'       => $data['image'],
            'image_title' => $data['image_title'],
            'stock'       => $data['stock']
        ]);
    }

    // delete item in database
    public function deleteItem(): void {
        $db = (new DBConnection())->getConnection();
        $query = "DELETE FROM items
                  WHERE item_id = ?";
        $stmt = $db->prepare($query);
        $stmt->execute([$this->getItemId()]);
    }

    // edit item in database
    public function edit(array $data): void {
        $db = (new DBConnection())->getConnection();
        $query = "UPDATE items
                  SET user_fk     = :user_fk,
                      brand_fk    = :brand_fk,
                      item        = :item, 
                      resume      = :resume,
                      price       = :price,
                      description = :description,
                      image       = :image,
                      image_title = :image_title,
                      stock       = :stock
                  WHERE item_id = :item_id";
        $db->prepare($query)->execute([
            'item_id'     => $this->getItemId(),
            'user_fk'     => $data['user_fk'],
            'brand_fk'    => $data['brand_fk'],
            'item'        => $data['item'],
            'resume'      => $data['resume'],
            'price'       => $data['price'],
            'description' => $data['description'],
            'image'       => $data['image'],
            'image_title' => $data['image_title'],
            'stock'       => $data['stock'],
        ]);
    }

    /**
     * getters and setters
     */

    /**
     * @return mixed
     */
    public function getItemId(): ?int
    {
        return $this->item_id;
    }

    /**
     * @return mixed
     */
    public function getBrandFk()
    {
        return $this->brand_fk;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getImageTitle()
    {
        return $this->image_title;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }
}