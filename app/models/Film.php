<?php
class Film
{
    public function __construct(private PDO $db) {}

    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT judul, genre, tahun_rilis, sutradara, durasi, created_at FROM film ORDER BY judul'
        );
        return $stmt->fetchAll();
    }

    public function findByJudul(string $judul): array|false
    {
        $stmt = $this->db->prepare(
            'SELECT judul, genre, tahun_rilis, sutradara, durasi, created_at FROM film WHERE judul = :judul'
        );
        $stmt->execute([':judul' => $judul]);
        return $stmt->fetch();
    }

    public function insert(array $data): bool
    {
        $sql = 'INSERT INTO film (judul, genre, tahun_rilis, sutradara, durasi) 
                VALUES (:judul, :genre, :tahun_rilis, :sutradara, :durasi)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':judul'       => $data['judul'],
            ':genre'       => $data['genre'],
            ':tahun_rilis' => $data['tahun_rilis'],
            ':sutradara'   => $data['sutradara'],
            ':durasi'      => $data['durasi']
        ]);
    }

    public function update(string $oldJudul, array $data): bool
    {
        $sql = 'UPDATE film 
                SET judul = :judul, genre = :genre, tahun_rilis = :tahun_rilis, sutradara = :sutradara, durasi = :durasi 
                WHERE judul = :old_judul';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':old_judul'   => $oldJudul,
            ':judul'       => $data['judul'],
            ':genre'       => $data['genre'],
            ':tahun_rilis' => $data['tahun_rilis'],
            ':sutradara'   => $data['sutradara'],
            ':durasi'      => $data['durasi']
        ]);
    }

    public function delete(string $judul): bool
    {
        $stmt = $this->db->prepare(
            'DELETE FROM film WHERE judul = :judul'
        );
        return $stmt->execute([':judul' => $judul]);
    }
}