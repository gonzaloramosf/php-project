<?php
class Item {
    protected $itemId;
    protected $item;
    protected $resume;
    protected $price;
    protected $description;
    protected $image;
    protected $imageTitle;

    public function all(): array {
        $filename = __DIR__ . '/../Database/database.json';
        $json = file_get_contents($filename);
        $data = json_decode($json, true);
        $items = [];

        foreach ($data as $value) {
            $item = new Item();
            $item->itemId      = $value['itemId'];
            $item->item        = $value['item'];
            $item->resume      = $value['resume'];
            $item->price       = $value['price'];
            $item->description = $value['description'];
            $item->image       = $value['image'];
            $item->imageTitle  = $value['imageTitle'];

            $items[] = $item;
        }
        return $items;
    }

    public function getItemById(int $id): ?Item {
        $items = (New Item())->all();
        foreach ($items as $item) {
            if ($item->itemId == $id) {
                return $item;
            }
        }
        return null;
    }

    /**
     * getters and setters
    */
    public function getItemId(): ?int {
        return $this->itemId;
    }

    public function getItem(): ?string {
        return $this->item;
    }

    public function getResume(): ?string {
        return $this->resume;
    }

    public function getPrice(): ?string {
        return $this->price;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function getImage(): ?string {
        return $this->image;
    }

    public function getImageTitle(): ?string {
        return $this->imageTitle;
    }
}