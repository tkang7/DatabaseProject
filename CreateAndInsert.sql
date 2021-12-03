/* DELETE ALL TABLES */

DROP TABLE KPOPGROUP CASCADE CONSTRAINTS;
DROP TABLE ARTIST CASCADE CONSTRAINTS;
DROP TABLE ALBUMVERSION CASCADE CONSTRAINTS;
DROP TABLE ALBUM CASCADE CONSTRAINTS;
DROP TABLE INCLUSION CASCADE CONSTRAINTS;
DROP TABLE PHOTOCARD CASCADE CONSTRAINTS;
DROP TABLE POSTCARD CASCADE CONSTRAINTS;
DROP TABLE POSTER CASCADE CONSTRAINTS;
DROP TABLE USERS CASCADE CONSTRAINTS;
DROP TABLE COLLECTINCLUSION CASCADE CONSTRAINTS;
DROP TABLE MERCHANDISE CASCADE CONSTRAINTS;
DROP TABLE COLLECTMERCHANDISE CASCADE CONSTRAINTS;
DROP TABLE POSTINCLUDES CASCADE CONSTRAINTS;
DROP TABLE POST CASCADE CONSTRAINTS;
DROP TABLE WANTEDPOST CASCADE CONSTRAINTS;
DROP TABLE SELLINGPOST CASCADE CONSTRAINTS;
DROP TABLE TRADINGPOST CASCADE CONSTRAINTS;
DROP TABLE INTERACTEDPOST CASCADE CONSTRAINTS;
DROP TABLE INCLUSIONCATEGORY CASCADE CONSTRAINTS;

/* 
FINAL PROJECT - CPSC304
CREATING TABLES
*/

CREATE TABLE KPOPGROUP(
    GROUPNAME   CHAR(20),
    PRIMARY KEY (GROUPNAME)
);
GRANT SELECT ON KPOPGROUP TO PUBLIC;

-- EXPLANATION FOR ON DELETE SET NULL:
-- WHEN KPOPGROUP GETS DELETED, YOU COULD HAVE A SOLO ARTIST WHO STILL REMAINS ACTIVE
CREATE TABLE ARTIST(
    ARTISTID    CHAR(20),
    GROUPNAME   CHAR(20), 
    STAGENAME   CHAR(20),
    REALNAME    CHAR(20),
    BIRTHDATE   DATE,
    PRIMARY KEY (ARTISTID),
    FOREIGN KEY (GROUPNAME) REFERENCES KPOPGROUP ON DELETE SET NULL
);
GRANT SELECT ON ARTIST TO PUBLIC;

-- CIRCULAR REFERENCE TO ALBUM IS PROBLEMATIC
-- I'M REMOVING THIS TABLE UNTIL IT'S FOUND THAT WE ABSOLUTELY NEED IT
-- ALBUMVERSION IS DEPENDENT ON ALBUM ANYWAYS AND ALBUM CONTAINS EVERYTHING ALBUMVERSION ALREADY HAS
--
-- CREATE TABLE ALBUMVERSION(
--     ALBUMNAME   CHAR(20) NOT NULL,
--     VERSIONNAME CHAR(20),
--     PRIMARY KEY (ALBUMNAME, VERSIONNAME)
-- );
-- GRANT SELECT ON ALBUMVERSION TO PUBLIC;

-- ON DELETE CASCADE SINCE IF THE GROUP NO LONG EXISTS, THE ALBUM SHOULD BE DELETED AS WELL
CREATE TABLE ALBUM(
    ALBUMNAME   CHAR(20),
    GROUPNAME   CHAR(20),
    VERSIONNAME CHAR(20),
    DATECREATED DATE,
    PRIMARY KEY (ALBUMNAME, VERSIONNAME),
    FOREIGN KEY (GROUPNAME) REFERENCES KPOPGROUP ON DELETE CASCADE
);
GRANT SELECT ON ALBUM TO PUBLIC;

/* MODIFY ALBUMVERSION AND ALBUM TABLES TO INCLUDE CIRCULAR REFERENCE*/
-- ALTER TABLE ALBUMVERSION ADD CONSTRAINT FK_ALBUMNAME FOREIGN KEY (ALBUMNAME, VERSIONNAME) REFERENCES ALBUM(GROUPNAME, ALBUMNAME) DEFERRABLE INITIALLY IMMEDIATE;

-- ALTER TABLE ALBUM ADD CONSTRAINT FK_VERSIONNAME FOREIGN KEY (GROUPNAME, ALBUMNAME) REFERENCES ALBUMVERSION(ALBUMNAME, VERSIONNAME) ON DELETE CASCADE DEFERRABLE INITIALLY IMMEDIATE;

CREATE TABLE INCLUSION(
    INCLUSIONID CHAR(20),
    ALBUMNAME   CHAR(20),
    VERSIONNAME CHAR(20),
    PRIMARY KEY (INCLUSIONID),
    FOREIGN KEY (ALBUMNAME, VERSIONNAME) REFERENCES ALBUM(ALBUMNAME, VERSIONNAME) ON DELETE CASCADE
);
GRANT SELECT ON INCLUSION TO PUBLIC;


CREATE TABLE PHOTOCARD(
    INCLUSIONID CHAR(20),
    ARTISTID    CHAR(20),
    PRIMARY KEY (INCLUSIONID),
    FOREIGN KEY (INCLUSIONID) REFERENCES INCLUSION ON DELETE CASCADE,
    FOREIGN KEY (ARTISTID) REFERENCES ARTIST ON DELETE CASCADE
);
GRANT SELECT ON PHOTOCARD TO PUBLIC;


CREATE TABLE POSTCARD(
    INCLUSIONID CHAR(20),
    PRIMARY KEY (INCLUSIONID),
    FOREIGN KEY (INCLUSIONID) REFERENCES INCLUSION ON DELETE CASCADE
);
GRANT SELECT ON POSTCARD TO PUBLIC;


CREATE TABLE POSTER(
    INCLUSIONID CHAR(20),
    PRIMARY KEY (INCLUSIONID),
    FOREIGN KEY (INCLUSIONID) REFERENCES INCLUSION ON DELETE CASCADE
);
GRANT SELECT ON POSTER TO PUBLIC;


CREATE TABLE USERS(
    USERID      CHAR(20),
    USERNAME    CHAR(20),
    USEREMAIL    CHAR(40),
    PRIMARY KEY (USERID)
);
GRANT SELECT ON USERS TO PUBLIC;


CREATE TABLE COLLECTINCLUSION(
    USERID      CHAR(20),
    INCLUSIONID CHAR(20),
    COLLECTSTATUS CHAR(20),
    PRIMARY KEY (USERID, INCLUSIONID),
    FOREIGN KEY (USERID) REFERENCES USERS ON DELETE CASCADE,
    FOREIGN KEY (INCLUSIONID) REFERENCES INCLUSION ON DELETE CASCADE
);
GRANT SELECT ON COLLECTINCLUSION TO PUBLIC;

CREATE TABLE MERCHANDISE(
    MERCHID     CHAR(20),
    MERCHTYPE   CHAR(20),
    MODELYEAR   DATE,
    GROUPNAME   CHAR(20),
    PRIMARY KEY (MERCHID),
    FOREIGN KEY (GROUPNAME) REFERENCES KPOPGROUP ON DELETE CASCADE
);
GRANT SELECT ON MERCHANDISE TO PUBLIC;


CREATE TABLE COLLECTMERCHANDISE(
    USERID      CHAR(20),
    MERCHID     CHAR(20),
    PRIMARY KEY (USERID, MERCHID),
    FOREIGN KEY (USERID) REFERENCES USERS ON DELETE CASCADE,
    FOREIGN KEY (MERCHID) REFERENCES MERCHANDISE ON DELETE CASCADE
);
GRANT SELECT ON COLLECTMERCHANDISE TO PUBLIC;

CREATE TABLE INCLUSIONCATEGORY(
    INCLUSIONID CHAR(20),
    INCLUSIONCATEGORY CHAR(20),
    PRIMARY KEY (INCLUSIONID)
);
GRANT SELECT ON INCLUSIONCATEGORY TO PUBLIC;


CREATE TABLE POST(
    POSTID      CHAR(20),
    POSTDATE    DATE,
    POSTSTATUS  CHAR(20),
    OPID        CHAR(20) NOT NULL,
    INCLUSIONID CHAR(20),
    QUANTITY    INTEGER,
    MERCHID     CHAR(20),
    PRIMARY KEY (POSTID),
    FOREIGN KEY (OPID) REFERENCES USERS ON DELETE SET NULL,
    FOREIGN KEY (INCLUSIONID) REFERENCES INCLUSION ON DELETE SET NULL,
    FOREIGN KEY (MERCHID) REFERENCES MERCHANDISE ON DELETE SET NULL
);
GRANT SELECT ON POST TO PUBLIC;

-- RELATIONSHIP (SO NO PRIMARY KEY)
CREATE TABLE POSTINCLUDES(
    MERCHID     CHAR(20),
    POSTID      CHAR(20),
    FOREIGN KEY (MERCHID) REFERENCES MERCHANDISE ON DELETE CASCADE,
    FOREIGN KEY (POSTID) REFERENCES POST(POSTID) ON DELETE CASCADE
);
GRANT SELECT ON POSTINCLUDES TO PUBLIC;

CREATE TABLE WANTEDPOST(
    POSTID      CHAR(20),
    PRICE       INTEGER, 
    PRIMARY KEY (POSTID)
);
GRANT SELECT ON WANTEDPOST TO PUBLIC;


CREATE TABLE SELLINGPOST(
    POSTID      CHAR(20),
    PRICE       INTEGER, 
    PRIMARY KEY (POSTID)
);
GRANT SELECT ON SELLINGPOST TO PUBLIC;


CREATE TABLE TRADINGPOST(
    POSTID      CHAR(20),
    PRIMARY KEY (POSTID)
);
GRANT SELECT ON TRADINGPOST TO PUBLIC;


CREATE TABLE INTERACTEDPOST(
    USERID      CHAR(20),
    OPID        CHAR(20),
    POSTID      CHAR(20),
    INTERACTSTATUS  CHAR(20),
    PRIMARY KEY (USERID, POSTID),
    FOREIGN KEY (USERID) REFERENCES USERS ON DELETE SET NULL,
    FOREIGN KEY (OPID) REFERENCES USERS ON DELETE SET NULL,
    FOREIGN KEY (POSTID) REFERENCES POST ON DELETE CASCADE
);
GRANT SELECT ON INTERACTEDPOST TO PUBLIC;

-- begin transaction;
-- set constraints all deferred;
-- inserting data to database

insert into KPopGroup
values('Seventeen');

insert into KPopGroup
values('Nineteen');

insert into KPopGroup
values('13');

insert into KPopGroup
values('sixteen');

insert into KPopGroup
values('Stray Kids');

insert into Artist
values('artistID_1', 'Nineteen', 'S.Coups', 'cheo seung cheul', '8/AUG/95');

insert into Artist
values('artistID_2', 'Seventeen', 'labufanda', 'kang min ku', '30/MAY/92');

insert into Artist
values('artistID_3', '13', 'ishootpoki', 'kim so hyeon', '20/AUG/88');

insert into Artist
values('artistID_test', 'sixteen', 'taeyang', 'song min kyung', '3/AUG/80');

insert into Artist
values('artistID_4', 'Stray Kids', 'g-dragon', 'kang yun kyoung', '1/SEP/89');

insert into Album
values('An Ode', 'Seventeen', 'Hope', '16/SEP/11');

insert into Album
values('A Dode', '13', 'A Little Hope', '10/SEP/19');

insert into Album
values('A Code', 'Stray Kids', 'No Hope', '16/NOV/17');

insert into Album
values('I Sewed', 'Seventeen', 'Hope', '12/SEP/19');

insert into Album
values('You Load', 'Seventeen', 'Load', '16/SEP/19');

insert into Inclusion
values('inclID_test0', 'An Ode', 'Hope');

insert into Inclusion
values('inclID_test1', 'A Code', 'No Hope');

insert into Inclusion
values('inclID_test2', 'I Sewed', 'Hope');

insert into Inclusion
values('inclID_test3', 'An Ode', 'Hope');

insert into Inclusion
values('inclID_test4', 'A Dode', 'A Little Hope');

insert into Inclusion
values('inclID_test5', 'You Load', 'Load');

insert into Photocard
values('inclID_test1', 'artistID_test');

insert into Photocard
values('inclID_test2', 'artistID_1');

insert into Photocard
values('inclID_test3', 'artistID_3');

insert into Postcard
values('inclID_test4');

insert into Poster
values('inclID_test5');

insert into Poster
values('inclID_test0');

insert into Users
values('uID_test', 'test users', 'uID_test@gmail.com');

insert into Users
values('uID_test1', 'test users', 'uID1_test@gmail.com');

insert into Users
values('uid_charles', 'Charles Chen', 'charles.chen@gmail.com');

insert into Users
values('uid_kim', 'Kim Khan', 'kim.khan@gmail.com');

insert into Users
values('uid_merry', 'Merry Mueriel', 'merry.mueriel@gmail.com');

insert into Users
values('uid_Sarah', 'Sarah Song', 'Sarah.song@gmail.com');

insert into Users
values('uid_Andrew', 'Andrew Ant', 'Andrew.Ant@gmail.com');

insert into Users
values('uid_Butane', 'Butane Gas', 'butane.gas@gmail.com');

insert into CollectInclusion
values('uID_test', 'inclID_test2', 'Collected');

insert into CollectInclusion
values('uid_Butane', 'inclID_test3', 'Collected');

insert into CollectInclusion
values('uid_Butane', 'inclID_test1', 'Not Collected');

insert into CollectInclusion
values('uid_merry', 'inclID_test0', 'Not Collected');

insert into Merchandise
values('merchID_test', 'Hoodie', '12/JAN/19', 'Seventeen');

insert into Merchandise
values('merchID_test1', 'Shirt', '12/JAN/19', 'Seventeen');

insert into Merchandise
values('merchID_test2', 'Hat', '12/JAN/19', '13');

insert into Merchandise
values('merchID_test3', 'Shoe', '12/JAN/19', 'Nineteen');

insert into Merchandise
values('merchID_test4', 'Sock', '12/JAN/19', 'Stray Kids');

insert into CollectMerchandise
values('uID_test', 'merchID_test');

insert into CollectMerchandise
values('uid_Butane', 'merchID_test1');

insert into CollectMerchandise
values('uid_Butane', 'merchID_test');

insert into CollectMerchandise
values('uid_Butane', 'merchID_test3');

insert into CollectMerchandise
values('uid_Sarah', 'merchID_test3');

insert into CollectMerchandise
values('uID_test1', 'merchID_test1');

insert into CollectMerchandise
values('uid_Sarah', 'merchID_test');

insert into CollectMerchandise
values('uid_Sarah', 'merchID_test2');

insert into CollectMerchandise
values('uid_kim', 'merchID_test');

insert into CollectMerchandise
values('uid_charles', 'merchID_test');

insert into InclusionCategory
values('inclID_test3', 'Photocard');

insert into Post
values('postID_test1', '12/NOV/21', 'Open', 'uID_test', 'inclID_test1', 1, null);

insert into Post
values('postID_test2', '12/NOV/21', 'Open', 'uID_test', 'inclID_test2', 1, null);

insert into Post
values('postID_test3', '12/NOV/21', 'Open', 'uID_test', 'inclID_test3', 1, null);

insert into PostIncludes
values('merchID_test', 'postID_test2');

insert into WantedPost
values('postID_test1', 1000);

insert into SellingPost
values('postID_test2', 100);

insert into TradingPost
values('postID_test3');

insert into InteractedPost
values('uID_test', 'uID_test', 'postID_test3', 'View');

commit;