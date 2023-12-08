<!-- Criação do banco de dados -->
```sql

    create DATABASE contas;

```

<!-- criação da tabela onde as contas são amrazenadas -->
```sql

    create table contas (
        id INT PRIMARY KEY AUTO_INCREMENT,
        user varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        password varchar(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

```

<!-- criação da tabela onde as mensagens dos uuários que são criadas na tela de contato são armazenadas -->
```sql

    create table contato (
        id INT PRIMARY KEY AUTO_INCREMENT,
        nome varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        report varchar(500) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

```