
create table communityhistory (
    id int unsigned not null primary key auto_increment,
    skey char(32) not null,
    dateUpdated datetime not null,
    key ( skey )
);
