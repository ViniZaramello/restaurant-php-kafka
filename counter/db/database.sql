CREATE TABLE order_table
(
    idt_order    VARCHAR(50)                                          NOT NULL,
    dat_order    DATE                                                 NOT NULL,
    number_table INT,
    status_order ENUM ('CREATED', 'RECEIVED', 'FINISHED', 'CANCELED') NOT NULL,
    num_total    DECIMAL DEFAULT 0.00                                 NOT NULL,

    CONSTRAINT IDT_ORD_PK PRIMARY KEY (idt_order)
);

CREATE TABLE item_order
(
    idt_item                INT PRIMARY KEY AUTO_INCREMENT,
    idt_order               INT          NOT NULL,
    idt_product             INT          NOT NULL,
    num_quantity            INT          NOT NULL DEFAULT 1,
    des_ingredients         VARCHAR(255) NOT NULL,
    des_ingredients_removed VARCHAR(255),
    des_ingredients_added   VARCHAR(255),

    CONSTRAINT IDT_ITM_ORD_PK PRIMARY KEY (idt_item),
    CONSTRAINT IDT_ORD_FK FOREIGN KEY (idt_order) REFERENCES order_table (idt_order),
    CONSTRAINT IDT_PRD_FK FOREIGN KEY (idt_product) REFERENCES product (idt_product)
);

CREATE TABLE product
(
    idt_product     INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nam_product     VARCHAR(45)                    NOT NULL,
    num_price       DECIMAL                        NOT NULL,
    des_product     VARCHAR(255),
    des_ingredients VARCHAR(255),
    status_product  ENUM ('ACTIVE', 'INACTIVE')    NOT NULL DEFAULT 'ACTIVE',

    CONSTRAINT IDT_PRD_PK PRIMARY KEY (idt_product)
);

INSERT INTO product (nam_product, num_price, des_product, des_ingredients)
VALUES ('Pizza de calabresa', 10.00, 'Deliciosa pizza que vem queijo, tomate e calabresa', 'Tomate, Queijo, Calabresa');

INSERT INTO product (nam_product, num_price, des_product, des_ingredients)
VALUES ('Lasanha de queijo', 10.00, 'Lasanha caprichado no queijo', 'Molho Branco, Queijo, Oregano');
