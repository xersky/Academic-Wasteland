CREATE OR REPLACE TYPE ARRAY_OF_VARCHAR IS VARRAY(100) OF VARCHAR2(255);
CREATE OR REPLACE TYPE ARRAY_OF_INT IS VARRAY(100) OF INT;
CREATE TYPE Tuple2 IS OBJECT (left NUMBER, right NUMBER);