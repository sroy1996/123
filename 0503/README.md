AJAX �Ҧ�

�]�w php.ini

�]���ϥΤF POST �o�e JSON ���, �|Ĳ�o $HTTP_RAW_POST_DATA ���δ��ܰT��

Deprecated: Automatically populating $HTTP_RAW_POST_DATA is deprecated 
and will be removed in a future version. To avoid this warning set 
'always_populate_raw_post_data' to '-1' in php.ini and use the 
php://input stream instead.
�i�ק� php.ini �� 702 �檺

always_populate_raw_post_data = -1
�i�H���� $HTTP_RAW_POST_DATA ���ΰT���A�O�o�n�������}php�κ������A���C

�إ߸�ƪ�P�ϥΪ� (�P0329)

�}�ҩR�O���ܦr�� D:\xampp\mysql\bin\mysql -uroot

CREATE DATABASE test0329 DEFAULT CHARACTER SET 'utf8' DEFAULT COLLATE 'utf8_general_ci';
CREATE USER 'mememe'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON test0329.* TO 'mememe'@'localhost';
FLUSH PRIVILEGES;

USE test0329;

CREATE TABLE moneybook (
  m_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(200),
  cost INT
) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';