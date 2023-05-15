-- Path: BDD/Irreductible_Palois_data.sql
USE irreductible_palois;

/* Category */
INSERT INTO Category VALUES (null, 'Goodies');
INSERT INTO Category VALUES (null, 'Alcool');
INSERT INTO Category VALUES (null, 'Random');

/* Goodies */
INSERT INTO Product VALUES (null, 'Casque polonais (légérement abimé)','/img/casquePolonais.png','casquePolonais','Outil parfait pour initiation de famille','Ce casque est le légendaire casque de Sylvain, utilisé de génération en génération pour l''initation de famille il porte encore les marques des passages précédents.',69,1,0,1);
INSERT INTO Product VALUES (null, 'Table de beerpong ! (sans tréteau)','/img/logo.png','Table de beerpong','Table de beerpong','A compléter avec un tréteau',420,1,1,1);
INSERT INTO Product VALUES (null, 'NFT du logo irréductible','/img/NFC2.jpg','NFT','Le seul NFT du logo IR','..',1138,1,2,1);
INSERT INTO Product VALUES (null, 'Litron du VB','/img/Litron.webp','Litron','La seule vrai taille de bière','...',21.89,15,3,1);
INSERT INTO Product VALUES (null, 'Cigare','/img/cigare.jpg','Ciagre','Cigare préféré de Nico','...',12,500,4,1);
INSERT INTO Product VALUES (null, 'Bob Cochonou','/img/bob.png','Bob cochonou','L''apogée du style','...',19.99,12,5,1);

/* Alcool */
INSERT INTO Product VALUES (null,'Captain Morgan','/img/captain.png','Captain Morgan','Le rhum préféré de Cy-Tech','...',21.89,150,0,2);
INSERT INTO Product VALUES (null,'Poliakov','/img/Poliakov.png','Poliakov','Simple et classique pour t''exploser le crane','...',14,200,1,2);
INSERT INTO Product VALUES (null,'Ballantine''s','/img/ballantines.webp','Ballantines','Pour les parties de pauker !','...',19,30,2,2);
INSERT INTO Product VALUES (null,'Ricard','/img/ricard.webp','Ricard','Midi et quart, heure du Ricard','...',15,65,3,2);
INSERT INTO Product VALUES (null,'Jägermeister','/img/jager.webp','Jägermeister','A base de plante, comme un tête de chanvre','...',22,300,4,2);
INSERT INTO Product VALUES (null,'Baileys','/img/Baileys.png','Baileys','Pour remplacer le café','...',12,15,5,2);
INSERT INTO Product VALUES (null,'Maydie','/img/Maydie.png','Maydie','Vin rouge sucré et fruité','...',15,5,6,2);
/* Random */
INSERT INTO Product VALUES (null,'NH-90 Bi-turbines','/img/Ugo.jpg','NH-90','Le meilleur des hélicoptères','...',69420,1,0,3);
INSERT INTO Product VALUES (null,'Mois d''abonnement Dofus','/img/Leop.jpg','Dofus','Pour le meilleur gaming possible','...',5,999,1,3);
INSERT INTO Product VALUES (null,'Distributeur de smarties','/img/Remi.jpg','Smarties','Au cas ou il y a une petite faim','...',0.5,1,2,3);
INSERT INTO Product VALUES (null,'Jouet pour enfant','/img/Jesus.jpg','Jouet','Un anniversaire réussi','...',50,50,3,3);
INSERT INTO Product VALUES (null,'Carte graphique','/img/Ransan.jpg','Carte graphique','Bat Nvidia et AMD','...',1000000,5,4,3);
INSERT INTO Product VALUES (null,'Grille pain','/img/Naiwann.jpg','Grille pain','Il te grille comme personne','...',3773,9,5,3);
INSERT INTO Product VALUES (null,'Couteau de cuisine','/img/Mael.jpg','Couteau de cuisine','Cut cut','...',4,61,6,3);
INSERT INTO Product VALUES (null,'Balais à chiotte','/img/Goat.jpg','Balais à chiotte','Spouik spouik','...',6.9,7,7,3);

/* Header */
INSERT INTO Header VALUES (null, 'Les goodies', 'Soyer-unique avec vos goodies des irréductibles', 'q_max_goodies', 1);
INSERT INTO Header VALUES (null, 'Les alcools', 'Pour ne pas venir aux soirées les mains vides ;)', 'q_max_OH', 2);
INSERT INTO Header VALUES (null, 'Les aléatoires', "Random stuff (images non contractuelless)<p>PS : c'est les copains et ils sont d'accord</p>", 'q_max_autre', 3);

/* User */
INSERT INTO User VALUES (1, "admin", "administrator", "admin", FALSE);
Insert INTO User VALUES (null, "Paularis", "BDE", "Titoua49.3", FALSE);

/* Admin */
INSERT INTO Admin Values (null, 1);