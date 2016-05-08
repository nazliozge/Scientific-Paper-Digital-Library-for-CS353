CREATE TABLE member(userName VARCHAR(40) NOT NULL,
      password VARCHAR(40) NOT NULL, name VARCHAR(40) NOT NULL,
      phone int NOT NULL, address VARCHAR(50) NOT NULL,
      PRIMARY KEY(userName) );

      
CREATE TABLE subscriber(userName VARCHAR(40) NOT NULL,
      annualFee int NOT NULL, payDate DATE, PRIMARY KEY(userName), 
      FOREIGN KEY(userName) REFERENCES member(userName));


CREATE TABLE institution(institutionID int NOT NULL, 
      name VARCHAR(40) NOT NULL, address VARCHAR(100), 
      PRIMARY KEY(institutionID));
      
CREATE TABLE author(userName VARCHAR(40) NOT NULL, 
      resume VARCHAR(40) NOT NULL, institutionID int NOT NULL,
      PRIMARY KEY(userName), FOREIGN KEY(userName) REFERENCES member(userName),
      FOREIGN KEY(institutionID) REFERENCES institution(institutionID) );

CREATE TABLE researcher(userName VARCHAR(40) NOT NULL, 
      profession VARCHAR(40) NOT NULL, PRIMARY KEY(userName), 
      FOREIGN KEY(userName) REFERENCES author(userName) );
      
CREATE TABLE student(userName VARCHAR(40) NOT NULL, 
      eduStatus VARCHAR(40) NOT NULL, PRIMARY KEY(userName), 
      FOREIGN KEY(userName) REFERENCES author(userName) );
      
CREATE TABLE editor(userName VARCHAR(40) NOT NULL, 
      PRIMARY KEY(userName), FOREIGN KEY(userName) REFERENCES researcher(userName) );
      
CREATE TABLE composition(compID int NOT NULL, 
      name VARCHAR(40) NOT NULL, topic VARCHAR(40) NOT NULL, status VARCHAR(40) NOT NULL, 
      link VARCHAR(40), editorUserName VARCHAR(40), PRIMARY KEY(compID), 
      FOREIGN KEY(editorUserName) REFERENCES editor(userName) );
      
CREATE TABLE conference(compID int NOT NULL, 
      place VARCHAR(40) NOT NULL, date DATE NOT NULL, time TIME NOT NULL, 
      PRIMARY KEY(compID), FOREIGN KEY(compID) REFERENCES composition(compID) );
      
CREATE TABLE journal(compID int NOT NULL, PRIMARY KEY(compID), 
      FOREIGN KEY(compID) REFERENCES composition(compID) );
      
CREATE TABLE journalissue(compID int NOT NULL, 
      issue int NOT NULL, PRIMARY KEY(compID, issue), 
      FOREIGN KEY(compID) REFERENCES journal(compID) );
      
CREATE TABLE publication(isbn VARCHAR(40) NOT NULL, 
      name VARCHAR(40) NOT NULL, topic VARCHAR(40) NOT NULL, status VARCHAR(40) NOT NULL, 
      type VARCHAR(40) NOT NULL, link VARCHAR(40) NOT NULL, PRIMARY KEY(isbn));
      
CREATE TABLE cites(citedISBN VARCHAR(40) NOT NULL, 
      citingISBN VARCHAR(40) NOT NULL, PRIMARY KEY(citedISBN,citingISBN),
      FOREIGN KEY(citedISBN) REFERENCES publication(isbn), 
      FOREIGN KEY(citingISBN) REFERENCES publication(isbn) );
      
CREATE TABLE attend(compID int NOT NULL, userName VARCHAR(40) NOT NULL, 
      PRIMARY KEY(compID, userName), FOREIGN KEY(compID) REFERENCES conference(compID), 
      FOREIGN KEY(userName) REFERENCES member(userName) );
      
CREATE TABLE subscribe(compID int NOT NULL, userName VARCHAR(40) NOT NULL, 
      PRIMARY KEY(compID, userName), FOREIGN KEY(compID) REFERENCES composition(compID), 
      FOREIGN KEY(userName) REFERENCES member(userName) );
      
CREATE TABLE contribute(isbn VARCHAR(40) NOT NULL, 
      userName VARCHAR(40) NOT NULL, compID int NOT NULL, 
      PRIMARY KEY(isbn, userName, compID), FOREIGN KEY(isbn) REFERENCES publication(isbn), 
      FOREIGN KEY(userName) REFERENCES author(userName), 
      FOREIGN KEY(compID) REFERENCES composition(compID) );
      
CREATE TABLE review(isbn VARCHAR(40) NOT NULL, 
      authorUserName VARCHAR(40) NOT NULL, compID int NOT NULL, 
      editorUserName VARCHAR(40) NOT NULL, feedback VARCHAR(40), 
      PRIMARY KEY(isbn, authorUserName, compID), 
      FOREIGN KEY(isbn) REFERENCES publication(isbn), 
      FOREIGN KEY(authorUserName) REFERENCES author(userName),
      FOREIGN KEY(editorUserName) REFERENCES editor(userName), 
      FOREIGN KEY(compID) REFERENCES composition(compID) );
      
CREATE TABLE sponsor(sponsorID int NOT NULL, 
      firm VARCHAR(40) NOT NULL, type VARCHAR(40) NOT NULL, 
      PRIMARY KEY(sponsorID) );

CREATE TABLE sponsorship(sponsorID int NOT NULL, 
      compID int NOT NULL, PRIMARY KEY(sponsorID, compID), 
      FOREIGN KEY(sponsorID) REFERENCES sponsor(sponsorID),
      FOREIGN KEY(compID) REFERENCES conference(compID) );
      
CREATE TABLE contributepublication(isbn VARCHAR(40) NOT NULL, 
      userName VARCHAR(40) NOT NULL, PRIMARY KEY(isbn, userName), 
      FOREIGN KEY(isbn) REFERENCES publication(isbn), 
      FOREIGN KEY(userName) REFERENCES author(userName) );