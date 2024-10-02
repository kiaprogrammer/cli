<?php
// Kelas Node
class Node {
    public $data;
    public $next;

    public function __construct($data) {
        $this->data = $data;
        $this->next = null;
    }
}

// Kelas Circular Single Linked List
class CircularSinglyLinkedList {
    private $last;

    public function __construct() {
        $this->last = null;
    }

    // Metode untuk menyisipkan di awal
    public function insertAtBeginning($data) {
        $newNode = new Node($data);
        if ($this->last === null) {
            // List kosong, inisialisasi dengan node baru
            $this->last = $newNode;
            $this->last->next = $this->last; // Mengarah ke dirinya sendiri
        } else {
            // Menyisipkan node baru di depan
            $newNode->next = $this->last->next; // Node baru menunjuk ke head saat ini
            $this->last->next = $newNode; // Node terakhir menunjuk ke node baru
        }
    }

    // Metode untuk menyisipkan di akhir
    public function insertAtEnd($data) {
        $newNode = new Node($data);
        if ($this->last === null) {
            // List kosong, inisialisasi dengan node baru
            $this->last = $newNode;
            $this->last->next = $this->last; // Mengarah ke dirinya sendiri
        } else {
            // Menyisipkan node baru di akhir
            $newNode->next = $this->last->next; // Node baru menunjuk ke head
            $this->last->next = $newNode; // Node terakhir menunjuk ke node baru
            $this->last = $newNode; // Memperbarui node terakhir
        }
    }

    // Metode untuk menyisipkan setelah node tertentu
    public function insertAfter($data, $after) {
        if ($this->last === null) {
            echo "List kosong.\n";
            return;
        }

        $newNode = new Node($data);
        $temp = $this->last->next; // Memulai dari head
        do {
            if ($temp->data == $after) {
                $newNode->next = $temp->next; // Node baru menunjuk ke node setelah
                $temp->next = $newNode; // Node yang dicari menunjuk ke node baru
                if ($temp === $this->last) {
                    $this->last = $newNode; // Memperbarui node terakhir jika perlu
                } return;
            } $temp = $temp->next;
        } while ($temp !== $this->last->next);
        echo "$after tidak ada dalam list.\n";
    }

    // Metode untuk menampilkan list
    public function display() {
        if ($this->last === null) {
            echo "List kosong.\n";
            return;
        }
        $temp = $this->last->next; // Memulai dari head
        do {
            echo $temp->data . " ";
            $temp = $temp->next;
        } while ($temp !== $this->last->next);
        echo "\n";
    }

    // Metode untuk mendapatkan elemen pertama
    public function getFirst() {
        if ($this->last === null) {
            echo "List kosong.\n";
            return;
        }
        return $this->last->next->data; // Mengembalikan data dari head
    }

    // Metode untuk mendapatkan elemen terakhir
    public function getLast() {
        if ($this->last === null) {
            echo "List kosong.\n";
            return;
        }
        return $this->last->data; // Mengembalikan data dari node terakhir
    }
}

// Program utama untuk menguji Circular Single Linked List
$list = new CircularSinglyLinkedList();

// 1. Penyisipan di awal
$list->insertAtBeginning(10);
echo "Menyisipkan 10 di awal: ";
$list->display();
echo "---------------------------------------"."\n";

$list->insertAtBeginning(20);
echo "Menyisipkan 20 di awal: ";
$list->display();
echo "---------------------------------------"."\n";

// 2. Penyisipan di akhir
$list->insertAtEnd(30);
echo "Menyisipkan 30 di akhir: ";
$list->display();
echo "---------------------------------------"."\n";

// 3. Penyisipan setelah elemen/node tertentu
$list->insertAfter(25, 20);
echo "Menyisipkan 25 setelah 20: ";
$list->display();
echo "---------------------------------------"."\n";

$list->insertAfter(35, 30);
echo "Menyisipkan 35 setelah 30: ";
$list->display();
echo "---------------------------------------"."\n";
?>
