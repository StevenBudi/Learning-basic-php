def convert(filename):
    with open(f"C:\\xampp\\htdocs\\praktikum\\uas\\asset\\template\\{filename}.php", "w") as f:
        f.write("<?php echo(' ")
        code = open(f"C:\\xampp\\htdocs\\praktikum\\uas\\asset\\html\\{filename}.html", "r").read().replace("\'", '\"')
        f.write(code)

        f.write("') ?>")
        f.close()

convert("navbar")
convert("footer")