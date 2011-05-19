
create table manualComment (
    id int unsigned not null auto_increment,
    page varchar(100) not null,
    name varchar(100) not null,
    email varchar(255) null,
    body text not null,
    dateCreated datetime not null,
    primary key ( id )
);

create index manualComment_page
on manualComment ( page );

