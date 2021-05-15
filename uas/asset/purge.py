import mysql.connector as conn
from mysql.connector import Error

try:
    koneksi = conn.connect(host='localhost', database='restaurant', user='root', password='')
    if koneksi.is_connected():
        DB_INFO = koneksi.get_server_info()
        print(f"Connected to MySQL Server version - {DB_INFO}")
        cursor = koneksi.cursor()
        query = "SELECT DATABASE();"
        cursor.execute(query)
        record = cursor.fetchone()
        print("You're connected to database: ", record)
        query1 = "DELETE FROM `reservation_customer`;"
        query2 = "UPDATE `restaurant_table` SET availability='true' WHERE availability='false';"
        query3 = "DELETE FROM `reservation_detail`;"
        cursor.execute(query1)
        koneksi.commit()
        print("Success delete all data in `reservation_customer`")
        cursor.execute(query2)
        koneksi.commit()
        print("Success set all data in `restaurant_table`")
        cursor.execute(query3)
        koneksi.commit()
        print("Success delete all data in `reservation_detail`")
except Error as e:
    print(e)
finally:
    if koneksi.is_connected():
        cursor.close()
        koneksi.close()
        print("Connection closed")

