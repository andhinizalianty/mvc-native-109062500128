<?php
class FilmController
{
    public function __construct(private Film $model) {}

    public function index(): void
    {
        $films = $this->model->getAll();
        require __DIR__ . '/../views/film/index.php';
    }

    public function create(): void
    {
        require __DIR__ . '/../views/film/create.php';
    }

    public function store(): void
    {
        $data = $this->validateInput($_POST);
        $this->model->insert($data);
        header('Location: index.php?page=film');
        exit();
    }

    public function edit(): void
    {
        $judul = $_GET['judul'] ?? '';
        $film = $this->model->findByJudul($judul);

        if (!$film) {
            http_response_code(404);
            exit("Data film tidak ditemukan.");
        }

        require __DIR__ . '/../views/film/edit.php';
    }

    public function update(): void
    {
        $oldJudul = $_POST['old_judul'] ?? '';
        $data = $this->validateInput($_POST);
        $this->model->update($oldJudul, $data);
        header('Location: index.php?page=film');
        exit();
    }

    public function delete(): void
    {
        $judul = $_POST['judul'] ?? '';
        $this->model->delete($judul);
        header('Location: index.php?page=film');
        exit();
    }

    private function validateInput(array $input): array
    {
        $data = [
            'judul'       => trim($input['judul'] ?? ''),
            'genre'       => trim($input['genre'] ?? ''),
            'tahun_rilis' => trim($input['tahun_rilis'] ?? ''),
            'sutradara'   => trim($input['sutradara'] ?? ''),
            'durasi'      => trim($input['durasi'] ?? '')
        ];

        if ($data['judul'] === '' || $data['genre'] === '' || $data['tahun_rilis'] === '' || $data['sutradara'] === '' || $data['durasi'] === '') {
            exit("Semua atribut film (judul, genre, tahun rilis, sutradara, durasi) wajib diisi.");
        }

        return $data;
    }
}