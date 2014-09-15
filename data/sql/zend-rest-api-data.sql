use `zend-rest-api`;

INSERT INTO `brewery` (`name`,`city`,`website`) VALUES ('Summit Brewing Company','St. Paul, MN','www.summitbrewingcompany.com');
INSERT INTO `brewery` (`name`,`city`,`website`) VALUES ('Harriet Brewing','Minneapolis, MN','www.harrietbrewing.com');

INSERT INTO `beer`(`name`, `brewery_id`, `style`, `ibu`) VALUES ('Extra Pale Ale', 1, 'Pale Ale', 45);
INSERT INTO `beer`(`name`, `brewery_id`, `style`, `ibu`) VALUES ('Horizon Red IPA', 1, 'India Pale Ale', 70);
INSERT INTO `beer`(`name`, `brewery_id`, `style`, `ibu`) VALUES ('West Side', 2, 'India Pale Ale', 40);
