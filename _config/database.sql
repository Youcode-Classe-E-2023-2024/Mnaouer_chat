create table rooms
(
    rooms_id        bigint auto_increment
        primary key,
    rooms_name      varchar(255)                        null,
    rooms_timestamp timestamp default CURRENT_TIMESTAMP null,
    rooms_desc      text                                null,
    constraint rooms_rooms_id_uindex
        unique (rooms_id)
);

create table users
(
    users_id       bigint auto_increment
        primary key,
    users_username varchar(255) null,
    users_email    varchar(255) not null,
    users_password varchar(255) not null,
    constraint users_users_email_uindex
        unique (users_email),
    constraint users_users_id_uindex
        unique (users_id)
);

create table friends
(
    friends_sender_id   bigint     not null,
    friends_receiver_id bigint     null,
    friends_is_blocked  tinyint(1) null,
    friends_is_accepted tinyint(1) null,
    constraint friends_users_receiver_id_fk_2
        foreign key (friends_receiver_id) references users (users_id)
            on delete cascade,
    constraint friends_users_users_id_fk
        foreign key (friends_sender_id) references users (users_id)
            on delete cascade
);

create table messages
(
    messages_id        bigint auto_increment
        primary key,
    messages_user      bigint                              null,
    messages_room      bigint                              null,
    messages_text      varchar(255)                        null,
    messages_timestamp timestamp default CURRENT_TIMESTAMP null,
    constraint messages_messages_id_uindex
        unique (messages_id),
    constraint messages_rooms_rooms_id_fk
        foreign key (messages_room) references rooms (rooms_id)
            on delete cascade,
    constraint messages_users_users_id_fk
        foreign key (messages_user) references users (users_id)
            on delete cascade
);

create table users_rooms
(
    users_rooms_id         bigint               not null,
    rooms_users_id         bigint               not null,
    users_rooms_is_banned  tinyint(1) default 0 null,
    users_rooms_is_owner   tinyint(1) default 0 null,
    users_rooms_is_invited tinyint(1) default 0 null,
    constraint users_rooms_rooms_rooms_id_fk
        foreign key (rooms_users_id) references rooms (rooms_id)
            on delete cascade,
    constraint users_rooms_users_users_id_fk
        foreign key (users_rooms_id) references users (users_id)
            on delete cascade
);

