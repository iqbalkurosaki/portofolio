SELECT SUM(transaksi.unit) FROM transaksi WHERE transaksi.id_jenis_transaksi = 1

SELECT SUM(transaksi.unit) FROM transaksi WHERE transaksi.id_jenis_transaksi = 1 GROUP BY transaksi.id_klien

SELECT transaksi.id_klien, transaksi.id_reksadana, SUM(transaksi.unit) AS up FROM transaksi WHERE transaksi.id_jenis_transaksi = 1 GROUP BY transaksi.id_klien, transaksi.id_reksadana

SELECT transaksi.id_klien, transaksi.id_reksadana, SUM(transaksi.unit) AS up FROM transaksi WHERE transaksi.id_jenis_transaksi = 2 GROUP BY transaksi.id_klien, transaksi.id_reksadana

SELECT transaksi.id_klien, transaksi.id_reksadana, SUM(transaksi.unit) AS up, transaksi.id_reksadana_tujuan FROM transaksi WHERE transaksi.id_jenis_transaksi = 3 GROUP BY transaksi.id_klien, transaksi.id_reksadana, transaksi.id_reksadana_tujuan


SELECT transaksi_beli.*, transaksi_jual.*, NULL AS tujuan FROM transaksi_beli LEFT OUTER JOIN transaksi_jual ON transaksi_beli.id_klien = transaksi_jual.id_klien AND transaksi_beli.id_reksadana = transaksi_jual.id_reksadana UNION SELECT * FROM transaksi_beli LEFT OUTER JOIN transaksi_alih ON transaksi_beli.id_klien = transaksi_alih.id_klien AND transaksi_beli.id_reksadana = transaksi_alih.id_reksadana


SELECT 1 AS id_jenis_transaksi, transaksi_beli.*, 0 AS id_reksadana_tujuan FROM transaksi_beli
UNION
SELECT 2 AS id_jenis_transaksi, transaksi_jual.*, 0 AS id_reksadana_tujuan FROM transaksi_jual
UNION
SELECT 3 AS id_jenis_transaksi, transaksi_alih.* FROM transaksi_alih






SELECT transaksi_all.up INTO @beli FROM transaksi_all WHERE transaksi_all.id_klien = NEW.id_klien AND transaksi_all.id_reksadana = NEW.id_reksadana AND transaksi_all.id_jenis_transaksi = 1;
SELECT transaksi_all.up INTO @jual FROM transaksi_all WHERE transaksi_all.id_klien = NEW.id_klien AND transaksi_all.id_reksadana = NEW.id_reksadana AND transaksi_all.id_jenis_transaksi = 2;
SELECT transaksi_all.up INTO @alih FROM transaksi_all WHERE transaksi_all.id_klien = NEW.id_klien AND transaksi_all.id_reksadana = NEW.id_reksadana AND transaksi_all.id_jenis_transaksi = 3;
SELECT transaksi_all.id_reksadana_tujuan INTO @tujuan FROM transaksi_all WHERE transaksi_all.id_klien = NEW.id_klien AND transaksi_all.id_reksadana = NEW.id_reksadana AND transaksi_all.id_jenis_transaksi = 3;
UPDATE up_klien SET up_klien.up = (@beli - @jual - @alih) WHERE up_klien.id_klien = NEW.id_klien AND up_klien.id_reksadana = NEW.id_reksadana;
UPDATE up_klien SET up_klien.up = (@beli - @jual + @alih) WHERE up_klien.id_klien = NEW.id_klien AND up_klien.id_reksadana = @tujuan;
