import mysql.connector as conn
from mysql.connector import Error

host_args = {
    "host":"localhost",
    "database":"restaurant",
    "user":"root",
    "password":''
}

try:
    koneksi = conn.connect(**host_args)
    if koneksi.is_connected():
        DB_INFO = koneksi.get_server_info()
        print(f"Connected to MySQL Server version - {DB_INFO}")
        cursor = koneksi.cursor()
        query = "SELECT DATABASE();"
        cursor.execute(query)
        record = cursor.fetchone()
        print("You're connected to database: ", record)
        SQL = '''DELETE FROM `reservation_customer`;
            UPDATE `restaurant_table` SET availability='true' WHERE availability='false';
            DELETE FROM `reservation_detail`;
            ALTER TABLE `reservation_detail` AUTO_INCREMENT=0;
            '''
        for result in cursor.execute(SQL, multi=True):
            print(result)
except Error as e:
    print(e)
finally:
    if koneksi.is_connected():
        koneksi.commit()
        cursor.close()
        koneksi.close()
        print("Connection closed")

