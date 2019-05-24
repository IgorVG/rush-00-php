CREATE TABLE IF NOT EXISTS `customers`(`id_customer` INT PRIMARY KEY AUTO_INCREMENT, `email` VARCHAR(255), `password` VARCHAR(128), `first_name` VARCHAR(255), `last_name` VARCHAR(255), `archive` VARCHAR(255), `admin` BOOL);

CREATE TABLE IF NOT EXISTS `inventory`(`id_product` INT PRIMARY KEY AUTO_INCREMENT, `name` VARCHAR(255), `category` VARCHAR(255), `category2` VARCHAR(255), `price` FLOAT, `photo` VARCHAR(255));

CREATE TABLE IF NOT EXISTS `orders`(`id_order` INT PRIMARY KEY AUTO_INCREMENT, `id_customer` INT, `id_basket` INT, `archived` BOOL, `basket_serialize` VARCHAR (16383), `total` FLOAT);

INSERT INTO `inventory` (`name`, `category`,`category2`, `price`, `photo`) VALUES
("VoltBike Enduro ", "Velos","",1999, "https://electricbikereview.com/wp-content/assets/2017/05/voltbike-enduro-electric-bike-review-1200x600-c-default.jpg"),
("VanMoof Electrified S2","Velos","",2598,"https://cdn.hiconsumption.com/wp-content/uploads/2018/12/Vanmoof-Electrified-S2-Bike-00-Hero.jpg"),
("Vanmoof X2","Velos","",2400,"https://cdn.vox-cdn.com/thumbor/4JWcMpqC-GOpgm1Xmo9U-47Oj84=/800x0/filters:no_upscale()/cdn.vox-cdn.com/uploads/chorus_asset/file/11438969/EX2_fog_white_40front_copy.png"),
("Haibike xDuro HardSeven","Velos","",2300,"https://www.e-bikeshop.co.uk/image/data/17-Haibike-xDuro/HardSeven-4.0/Haibike-xDuro-HardSeven-4.0-2017-Electric-Bike.jpg"),
("Haibike Sduro","Velos","",4300,"https://www.haibike.com/dist/static/images/bikes/bike4.png"),
("Peugeot 208","Voitures","",11099,"https://static1.caroom.fr/uploads/models/miniature-500/peugeot-208.jpg"),
("Ford Ka","Voitures","",12909,"https://www.fordeumedia-c.ford.com/nas/gforcenaslive/fra/cdu02/yyl/images/resize767xfracdu02yylbs-vgvs-dh(a)(a)pnyw5_21_0.png"),
("Volkswagen Polo","Voitures","",7999,"https://cdn.euroncap.com/media/30740/volkswagen-polo-359-235.jpg"),
("BMW Q5","Voitures","",30000,"https://pictures.dealer.com/a/audihiltonheadaoa/1681/0f52ab76b9d0bf75b2d841405b1db046x.jpg"),
("iPhone XS","Telephones","Jeux",1100,"https://images-na.ssl-images-amazon.com/images/I/61UXPmnTC9L._SY550_.jpg"),
("Huawei P20 Pro","Telephones","Jeux",1200,"https://dyw7ncnq1en5l.cloudfront.net/optim/produits/450/43593/huawei-p20-pro_6ab7a438466c84c8.jpg"),
("Samsung Galaxy S10","Telephones","Jeux",1000,"https://bestengine.humanoid.fr/uploads/products/samsung-galaxy-s10-2019-frandroid.png"),
("Assassin's Creed Odyssey","Jeux","",40,"https://dyw7ncnq1en5l.cloudfront.net/optim/produits/0/44631/ubi-soft-assassin-s-creed-odyssey_0652eb23e0f9dbfc.jpg"),
("Pokémon Let's Go!","Jeux","",49,"https://static.fnac-static.com/multimedia/Images/FR/NR/c6/f5/8d/9303494/1540-1/tsp20180530152151/Pokemon-Let-s-Go-Evoli-Nintendo-Switch.jpg"),
("Ice cream","Nourriture","",3,"http://aucdn.ar-cdn.com/recipes/land500/89a22708-e94b-4e30-96e6-8fdf305fc138.jpg");