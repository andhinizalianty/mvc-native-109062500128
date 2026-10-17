<!DOCTYPE html> 
<html lang="id"> 
<head>     
    <meta charset="UTF-8">     
    <title>Tambah Film</title> 
</head> 
<body>     
    <h2>Tambah Film</h2>       
    
    <form method="post" action="index.php?page=film&action=store">         
        <label>Judul Film</label><br>         
        <input type="text" name="judul" required><br><br>           
        
        <label>Genre</label><br>         
        <input type="text" name="genre" required><br><br>           
        
        <label>Tahun Rilis</label><br>         
        <input type="number" name="tahun_rilis" required><br><br>   

        <label>Sutradara</label><br>
        <input type="text" name="sutradara" required><br><br> 
        
        <label>Durasi</label><br>
        <input type="text" name="durasi" required><br><br>
        
        <button type="submit">Simpan</button>         
        <a href="index.php?page=film">Kembali</a>     
    </form> 
</body> 
</html> 