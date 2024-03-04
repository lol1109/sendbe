<?php

	class Galeri extends CI_Model
	{
        //======================VIEWS============================
        function Images(){
            return $this->db->query("SELECT foto.FotoID, foto.JudulFoto, foto.DeskripsiFoto, foto.TanggalUnggah, foto.LokasiFile, foto.AlbumID, foto.UserID AS FotoUserID, user.UserID AS UserUserID, user.Username, user.Email, user.NamaLengkap, user.Alamat FROM foto INNER JOIN user ON foto.UserID = user.UserID;");
        }

        public function getImagesWithLimit($limit, $offset) {
            $this->db->select('foto.FotoID, foto.JudulFoto, foto.DeskripsiFoto, foto.TanggalUnggah, foto.LokasiFile, foto.AlbumID, foto.UserID AS FotoUserID, user.UserID AS UserUserID, user.Username, user.Email, user.NamaLengkap, user.Alamat');
            $this->db->from('foto');
            $this->db->join('user', 'foto.UserID = user.UserID');
            $this->db->limit($limit, $offset);
            return $this->db->get()->result();
        }        

        function Albums(){
            return $this->db->get('album');
        }

        function MyAlbums($user){
            return $this->db->query("SELECT * FROM album WHERE UserID = '$user'");
        }

        function ImagesByUserID($UserID){
            $this->db->select('foto.FotoID, foto.JudulFoto, foto.DeskripsiFoto, foto.TanggalUnggah, foto.LokasiFile, foto.AlbumID, foto.UserID AS FotoUserID, user.UserID AS UserUserID, user.Username, user.Email, user.NamaLengkap, user.Alamat');
            $this->db->from('foto');
            $this->db->where('foto.UserID', $UserID);
            $this->db->join('user', 'foto.UserID = user.UserID');
            return $this->db->get()->result();
        }

        function ImagesByID($FotoID){
            $this->db->select('foto.FotoID, foto.JudulFoto, foto.DeskripsiFoto, foto.TanggalUnggah, foto.LokasiFile, foto.AlbumID, foto.UserID AS FotoUserID, user.UserID AS UserUserID, user.Username, user.Email, user.NamaLengkap, user.Alamat');
            $this->db->from('foto');
            $this->db->where('foto.FotoID', $FotoID);
            $this->db->join('user', 'foto.UserID = user.UserID');
            return $this->db->get()->result();
        }

        public function users(){
            return $this->db->get('user');
        }

        public function getLikesByFotoID($fotoID) {
            return $this->db->where('FotoID', $fotoID)->get('likefoto')->result();
        }

        public function getKomenByFotoID($fotoID) {
            // Lakukan query untuk mendapatkan komentar berdasarkan FotoID
            $query = $this->db->query("SELECT komentarfoto.IsiKomentar, komentarfoto.TanggalKomentar, user.Username FROM komentarfoto INNER JOIN user ON komentarfoto.UserID = user.UserID WHERE FotoID = '$fotoID'");
            
            // Periksa apakah query berhasil
            if ($query) {
                // Kembalikan hasil query dalam bentuk array
                return $query->result_array();
            } else {
                // Jika query gagal, kembalikan array kosong atau nilai yang sesuai
                return array();
            }
        }

        public function getLikesByUserID($UserID, $FotoID) {
            return $this->db->get_where('likefoto', ['UserID' => $UserID, 'FotoID' => $FotoID])->result();
        }

        public function searchImagesByName($search){
            $this->db->select('foto.FotoID, foto.JudulFoto, foto.DeskripsiFoto, foto.TanggalUnggah, foto.LokasiFile, foto.AlbumID, foto.UserID AS FotoUserID, user.UserID AS UserUserID, user.Username, user.Email, user.NamaLengkap, user.Alamat');
            $this->db->from('foto');
            $this->db->join('user', 'foto.UserID = user.UserID');
            $this->db->like('JudulFoto', $search);
            return $this->db->get()->result();
        }

        // =====================TAMBAH==========================
		function TambahAlbum($data, $table){
			$this->db->insert($table, $data);
		}

        function tambahImage($data, $table){
			$this->db->insert($table, $data);
		}

        function tambahLike($data, $table){
			$this->db->insert($table, $data);
		}

        function tambahKomen($data, $table){
			$this->db->insert($table, $data);
		}

        function ubahImage($data, $table, $FotoID){
            $this->db->where('FotoID', $FotoID);
            $this->db->update($table, $data);
        }

        function hapusLike($user, $foto){
			$this->db->query("DELETE FROM likefoto WHERE `likefoto`.`UserID` = $user AND `likefoto`.`FotoID` = $foto");
		}
	}
 ?>