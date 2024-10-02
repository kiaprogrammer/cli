<?php
// Kelas yang merepresentasikan sebuah node dalam linked list circular
class Node {
    public $data;
    public $next;
    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

// Kelas yang merepresentasikan circular linked list
class CircularLinkedList {
    private $head;
    private $tail;
    public function __construct() {
        $this->head = null;
        $this->tail = null;
    }

    // Fungsi untuk menambahkan node di akhir list
    public function append($data) {
        $newNode = new Node($data);
        if ($this->head === null) {
            $this->head = $newNode;
            $this->tail = $newNode;
            $newNode->next = $this->head;
        } else {
            $this->tail->next = $newNode;
            $this->tail = $newNode;
            $this->tail->next = $this->head;
        }
    }

    // Fungsi untuk menampilkan list
    public function display() {
        if ($this->head === null) {
            echo "List kosong\n";
            return;
        }

        $current = $this->head;
        do {
            echo $current->data . " ";
            $current = $current->next;
        } while ($current !== $this->head);
        echo "\n";
    }

    // Fungsi untuk menghapus node di awal list
    public function deleteAtBeginning() {
        if ($this->head === null) {
            echo "List kosong\n";
            return;
        }

        if ($this->head === $this->tail) {
            $this->head = null;
            $this->tail = null;
        } else {
            $this->tail->next = $this->head->next;
            $this->head = $this->head->next;
        }
        echo "Node dihapus di awal\n";
    }

    // Fungsi untuk menghapus node di akhir list
    public function deleteAtEnd() {
        if ($this->head === null) {
            echo "List kosong\n";
            return;
        }

        if ($this->head === $this->tail) {
            $this->head = null;
            $this->tail = null;
        } else {
            $current = $this->head;
            while ($current->next !== $this->tail) {
                $current = $current->next;
            }
            $current->next = $this->head;
            $this->tail = $current;
        }
        echo "Node dihapus di akhir\n";
    }

    // Fungsi untuk menghapus node setelah data tertentu
    public function deleteAfter($data) {
        if ($this->head === null) {
            echo "List kosong\n";
            return;
        }
        $current = $this->head;
        do {
            if ($current->data === $data) {
                if ($current->next === $this->head) {
                    echo "Tidak ada node setelah node yang diberikan\n";
                } else {
                    $current->next = $current->next->next;
                    if ($current->next === $this->head) {
                        $this->tail = $current;
                    }
                    echo "Node dihapus setelah node dengan data $data\n";
                } return;
            }
            $current = $current->next;
        } while ($current !== $this->head);
        echo "Node dengan data $data tidak ditemukan\n";
    }
}

// Menguji kelas CircularLinkedList
$list = new CircularLinkedList();
$list->append(10);
$list->append(20);
$list->append(30);
$list->append(40);
$list->append(50);
$list->append(60);
$list->append(70);

echo "List Awal: ";
$list->display();
echo "------------------"."\n"."\n";
$list->deleteAtBeginning();
echo "Setelah menghapus di awal: ";
$list->display();
echo "------------------"."\n"."\n";
$list->deleteAtEnd();
echo "Setelah menghapus di akhir: ";
$list->display();
echo "------------------"."\n"."\n";
$list->deleteAfter(30);
echo "Setelah menghapus node setelah 30: ";
$list->display();
echo "------------------"."\n"."\n";
?>
