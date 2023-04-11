-- Menampilkan data member yang berada pada provinsi sumatera utara dan dalam satu kabupaten
SELECT * 
FROM mst_member
WHERE id_provinsi = 2
GROUP BY id_kabupaten
-- Menampilkan data provinsi yang tidak ada dalam data member
SELECT *
FROM mst_provinsi
WHERE where id not in (select id_provinsi from mst_member);
-- Menampilkan data kabupaten yang tidak ada dalam data member
SELECT *
FROM mst_kabupaten
where id_kabupaten not in (select id_kabupaten from mst_member);
-- Menampilkan data kecamatan yang tidak ada dalam data member
SELECT *
FROM mst_kecamatan
where id_kecamatan not in (select id_kecamatan from mst_member);
-- Menampilkan nama member yang terdapat di Kab. Simalungun
SELECT nama
FROM mst_member
WHERE id_kabupaten = 354
-- Menampilkan jumlah data instansi pada Kab. Bireuen dan Kab. Bener Meriah
SELECT SUM(member.id_instansi)
FROM mst_member as member inner join msi_instansi as instansi on member.id_indtansi = instansi.id_instansi
where instansi.kode_kabupaten = 302 and instansi.kode_kabupaten = 330;
-- Menampilkan data member yang berawalan huruf “M”
SELECT *
from mst_member
where nama LIKE 'M%'
-- Menampilkan alamat email yang mempunyai karakter “no” dan terdapat di provinsi Sumatera Utara
SELECT *
from mst_member
where nama  LIKE '%no%' and id_provinsi = 2
-- Menampilkan data member yang mempunyai kode instansi “2004”
SELECT *
from mst_member inner join mst instansi on mst_member.id_instansi = mst_instansi.id_instansi
where mst_instansi.kode_instansi = LIKE '%2004%'
-- Menampilkan data member yang mempunyai karakter kode kecamatan “.08.”
SELECT *
from mst_member inner join mst_kecamatan on mst_member.id_kecamatan = mst_kemacatan.id_kecamatan
where mst_kecamatan.kode_kecamatan  LIKE '%.08.%'