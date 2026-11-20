<?php

function tampilkanMenu() {
    echo "\n--- MENU ---\n";
    echo "1. Lihat Daftar Tugas\n";
    echo "2. Tambah Tugas\n";
    echo "3. Hapus Tugas\n";
    echo "4. Keluar\n";
}

function tampilkanTugas(array $tugas) {
    if (empty($tugas)) {
        echo "Tidak ada tugas yang tersimpan.\n";
        return;
    }

    echo "Daftar Tugas:\n";
    foreach ($tugas as $index => $item) {
        echo ($index + 1) . ". $item\n";
    }
}

function main() {
    $tugas = [];

    while (true) {
        tampilkanMenu();
        echo "Pilih opsi (1-4): ";
        $pilihan = trim(fgets(STDIN));

        if ($pilihan === '1') {
            tampilkanTugas($tugas);
        } elseif ($pilihan === '2') {
            $lanjut = 'y';

            while ($lanjut === 'y') {
                echo "Masukkan tugas baru: ";
                $namaTugas = trim(fgets(STDIN));

                if ($namaTugas !== '') {
                    $tugas[] = $namaTugas;
                    echo "Tugas berhasil ditambahkan.\n";
                } else {
                    echo "Nama tugas tidak boleh kosong.\n";
                }

                echo "Ingin menambah tugas baru lagi? (y/n): ";
                $lanjut = strtolower(trim(fgets(STDIN)));
            }
        } elseif ($pilihan === '3') {
            tampilkanTugas($tugas);

            if (!empty($tugas)) {
                echo "Masukkan nomor tugas yang ingin dihapus: ";
                $inputNomor = trim(fgets(STDIN));

                if (is_numeric($inputNomor)) {
                    $indexHapus = (int)$inputNomor - 1;

                    if (isset($tugas[$indexHapus])) {
                        $dihapus = $tugas[$indexHapus];
                        unset($tugas[$indexHapus]);
                        $tugas = array_values($tugas);
                        echo "[Sukses] '$dihapus' telah dihapus.\n";
                    } else {
                        echo "[Error] Nomor tugas tidak valid.\n";
                    }
                } else {
                    echo "[Error] Masukkan angka yang valid.\n";
                }
            }
        } elseif ($pilihan === '4') {
            echo "Terima kasih telah menggunakan aplikasi ini.\n";
            break;
        } else {
            echo "Opsi tidak valid. Silakan pilih antara 1-4.\n";
        }
    }
}

main();