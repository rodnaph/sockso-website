
create table communityhistory (
    id int unsigned not null primary key auto_increment,
    active_id int unsigned not null,
    dateUpdated datetime not null,
    key ( active_id )
);
