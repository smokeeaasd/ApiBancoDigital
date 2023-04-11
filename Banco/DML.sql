INSERT INTO correntista (nome, cpf, data_nasc, senha) VALUES ('João Silva', '11122233344', '1990-05-10', 'senha123');
INSERT INTO correntista (nome, cpf, data_nasc, senha) VALUES ('Maria Santos', '55566677788', '1985-01-15', 'abcd1234');
INSERT INTO correntista (nome, cpf, data_nasc, senha) VALUES ('Pedro Oliveira', '99988877766', '2000-11-20', 'minhasenha');

INSERT INTO conta (numero, tipo, senha, id_correntista) VALUES (123456, 'corrente', 'senhacorrente123', 1);
INSERT INTO conta (numero, tipo, senha, id_correntista) VALUES (654321, 'poupança', 'senhapoupanca456', 2);
INSERT INTO conta (numero, tipo, senha, id_correntista) VALUES (789012, 'investimento', 'senhainvestimento789', 3);

INSERT INTO chave_pix (chave, tipo, id_conta) VALUES ('1234567890', 'CPF', 1);
INSERT INTO chave_pix (chave, tipo, id_conta) VALUES ('joao@example.com', 'EMAIL', 2);
INSERT INTO chave_pix (chave, tipo, id_conta) VALUES ('987654321', 'TELEFONE', 3);

INSERT INTO transacao (data_transacao, valor) VALUES ('2022-01-01', 250.00);
INSERT INTO transacao (data_transacao, valor) VALUES ('2022-01-02', 150.00);
INSERT INTO transacao (data_transacao, valor) VALUES ('2022-01-03', 250.00);
INSERT INTO transacao (data_transacao, valor) VALUES ('2022-01-04', 150.00);
INSERT INTO transacao (data_transacao, valor) VALUES ('2022-01-05', 250.00);
INSERT INTO transacao (data_transacao, valor) VALUES ('2022-01-06', 150.00);

INSERT INTO transacao_conta (id_transacao, id_remetente, id_destinatario) VALUES (1, 1, 2);
INSERT INTO transacao_conta (id_transacao, id_remetente, id_destinatario) VALUES (2, 2, 1);

INSERT INTO transacao_conta (id_transacao, id_remetente, id_destinatario) VALUES (3, 2, 3);
INSERT INTO transacao_conta (id_transacao, id_remetente, id_destinatario) VALUES (4, 3, 2);

INSERT INTO transacao_conta (id_transacao, id_remetente, id_destinatario) VALUES (5, 1, 3);
INSERT INTO transacao_conta (id_transacao, id_remetente, id_destinatario) VALUES (6, 3, 1);