ALTER TABLE send_proposal 
    MODIFY COLUMN id INT AUTO_INCREMENT;

ALTER TABLE send_proposal
   ADD CONSTRAINT PK_send_proposal
   PRIMARY KEY(id);