def convert(filename):
    with open(f"C:\\xampp\\htdocs\\praktikum\\uas\\Public\\{filename}.php", "w") as f:
        f.write("<?php echo(' ")
        code = open(f"C:\\xampp\\htdocs\\praktikum\\uas\\Public\\html\\{filename}.html", "r").read().replace("\'", '\"')
        f.write(code)

        f.write("') ?>")
        f.close()

convert("index")