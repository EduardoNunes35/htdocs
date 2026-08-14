import mysql.connector
from docx import Document
import re

def ler_arquivo_docx(caminho_arquivo):
    """
    Lê o arquivo .docx e extrai os dados do plano de contas.
    Args:
        caminho_arquivo (str): O caminho para o arquivo .docx.
    Returns:
        list: Uma lista de dicionários, onde cada dicionário representa uma conta do plano.
              Cada dicionário contém as chaves 'codigo' e 'descricao'.
              Retorna uma lista vazia em caso de erro na leitura do arquivo.
    """

    dados = []
    try:
        document = Document(caminho_arquivo)
        mydb = mysql.connector.connect(
            host="localhost",           # Endereço do servidor MySQL (pode ser um IP)
            user="root",                # Seu nome de usuário do MySQL
            password="Pk2k3@noslimde",  # Sua senha do MySQL
            database="construcao"       # O nome do banco de dados que você quer usar
        )
        if mydb.is_connected():
            inserecursor = mydb.cursor()
            sql = "INSERT INTO planocontas (codconta, descricao, obs) VALUES (%s, %s, %s)"
            dados_para_inserir = []

            for paragraph in document.paragraphs:
                texto = paragraph.text.strip()
                # Modifiquei a regex usar como separador ;
                match = re.match(r'(\d+(?:\.\d+)*|\d+\.\*\.\*|\d+\.\*|\d+\.\d+\.\*);\s*(.*?);\s*(.*)$', texto)
                if match:
                    codigo = match.group(1).strip()
                    descricao = match.group(2).strip()
                    obs = match.group(3).strip()
                    dados.append({'codigo': codigo, 'descricao': descricao, 'obs': obs})
                    dados_para_inserir.append((codigo, descricao, obs))

            if dados_para_inserir:
                inserecursor.executemany(sql, dados_para_inserir)
                mydb.commit()
                print(f"{inserecursor.rowcount} registros inseridos com SUCESSO !!!")
            else:
                print("Nenhum dado de plano de contas encontrado no arquivo.")
        else:
            print("Falha ao conectar ao MySQL.")

    except Exception as e:
        print(f"Erro ao ler o arquivo: {e}")
        return []  # Retorna uma lista vazia em caso de erro
    finally:
        if 'inserecursor' in locals() and 'mydb' in locals() and mydb.is_connected():
            inserecursor.close()
            mydb.close()
    return dados

if __name__ == "__main__":
    caminho_arquivo = "planodecontas.docx"  # Substitua pelo caminho do seu arquivo

    confirmacao = input(f"Você deseja executar a leitura do arquivo '{caminho_arquivo}' e inserir os dados no banco de dados? (s/n): ").lower()

    if confirmacao == 's':
        plano_de_contas = ler_arquivo_docx(caminho_arquivo)

        if plano_de_contas:
            print("\nDados lidos do arquivo:")
            for conta in plano_de_contas:
                print(f"Código: {conta['codigo']}, Descrição: {conta['descricao']}, Obs: {conta['obs']}")
        else:
            print("Não foi possível ler os dados do plano de contas.")
    else:
        print("Execução cancelada pelo usuário.")
