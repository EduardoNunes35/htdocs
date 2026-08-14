import mysql.connector
from docx import Document
import re

def carrega_centro_custos_docx(caminho_arquivo):
    dados = []
    try:
        document = Document(caminho_arquivo)
        mydb = mysql.connector.connect(
            host="localhost",  # Endereço do servidor MySQL (pode ser um IP)
            user="root",      # Seu nome de usuário do MySQL
            password="Pk2k3@noslimde",  # Sua senha do MySQL
            database="construcao"        # O nome do banco de dados que você quer usar
        )
        if mydb.is_connected():
            inserecursor = mydb.cursor()
            sql = "INSERT INTO centro_custos (tipo, nm_centro_custo, codcontas) VALUES (%s, %s, %s)"
            dados_para_inserir = []

            for paragraph in document.paragraphs:
                texto = paragraph.text.strip()
                # Modifiquei a regex para ser mais flexível com os espaços
                # match = re.match(r'(\d+(?:\.\d+)*|\d+\.\*\.\*|\d+\.\*|\d+\.\d+\.\*)\s+(.*?)\s+(.*)$', texto)
                # Modifiquei a regex usar como separador ;
                match = re.match(r'(\d+(?:\.\d+)*|\d+\.\*\.\*|\d+\.\*|\d+\.\d+\.\*);\s*(.*?);\s*(.*)$', texto)
                if match:
                    tipo = match.group(1).strip()
                    nm_centro_custo = match.group(2).strip()
                    codcontas = match.group(3).strip()
                    dados.append({'tipo': tipo, 'nm_centro_custo': nm_centro_custo, 'codcontas': codcontas})
                    dados_para_inserir.append((tipo, nm_centro_custo, codcontas))

            if dados_para_inserir:
                inserecursor.executemany(sql, dados_para_inserir)
                mydb.commit()
                print(f"{inserecursor.rowcount} registros inseridos com sucesso.")
            else:
                print("Nenhum dado de CENTRO de CUSTOS encontrado no arquivo.")
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

# Exemplo de uso
caminho_arquivo = "centrocustos.docx"  # Substitua pelo caminho do seu arquivo
centro_custos = carrega_centro_custos_docx(caminho_arquivo)

if centro_custos:
    for conta in centro_custos:
        print(f"tipo: {conta['tipo']}, nm_centro_custo: {conta['nm_centro_custo']}, codcontas: {conta['codcontas']}")
else:
    print("Não foi possível ler os dados do CENTRO de CUSTOS.")
