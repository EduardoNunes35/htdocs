from gtts import gTTS

# Texto da sustentação oral
texto = """
SUSTENTAÇÃO ORAL
Incidente de Uniformização de Jurisprudência
EDMILSON JOAQUIM
Processo número: 0043401412020036301
Excelentíssimo Senhor Desembargador Presidente,
Ilustres Julgadores,
Venho, respeitosamente, sustentar as razões que motivaram a interposição do presente Incidente de Uniformização de Jurisprudência, cujo objetivo é assegurar a correta aplicação da jurisprudência desta Turma Nacional de Uniformização, bem como garantir a proteção aos direitos fundamentais do Recorrente.
O caso trata do reconhecimento de tempo de serviço rural, de execução provisória de decisão parcialmente favorável e da imprescindível fundamentação das decisões judiciais.

Primeiro ponto: a admissibilidade da prova exclusivamente testemunhal.
O acórdão recorrido negou o reconhecimento do tempo de serviço por entender inexistente prova material suficiente, desconsiderando a possibilidade, amplamente admitida pela jurisprudência desta TNU e do STJ, de suprimento da lacuna por prova testemunhal idônea.
Como sedimentado:
TNU - PEDILEF número 2005.72.95.00.8505-0 de Santa Catarina: admite-se a conjugação de início de prova material com prova testemunhal idônea.
STJ - REsp número 1.348.633 de São Paulo, Tema 642: é desnecessário início de prova material para toda a extensão do período.
A exigência de prova documental plena afronta a proteção social constitucional e desconsidera a realidade da atividade rural em regime de economia familiar, muitas vezes marcada pela informalidade.

Segundo ponto: a possibilidade de execução provisória.
O acórdão também afastou a execução provisória, sob argumento de competência exclusiva do Juízo de origem.
Todavia, está consolidado que:
TNU - PEDILEF número 5001839-17.2010.4.04.7003 do Paraná: admite-se a execução provisória de decisões parcialmente favoráveis, desde que ausente efeito suspensivo.
STJ - REsp número 1.401.560 do Mato Grosso: a ausência de efeito suspensivo não impede o cumprimento provisório da sentença.
Negar a execução provisória compromete a efetividade da jurisdição e viola o princípio da duração razoável do processo.

Terceiro ponto: a fundamentação das decisões.
A Turma Recursal limitou-se a ratificar genericamente a sentença, sem analisar fundamentos essenciais suscitados pelo Recorrente.
Nos termos do:
STJ - AgInt no REsp 1.603.943 de Minas Gerais: caracteriza-se negativa de prestação jurisdicional a ausência de enfrentamento das teses relevantes.
STF - ARE 848.107 do Distrito Federal: o dever de motivação exige o exame de todas as teses, ainda que para rejeitá-las.
A ausência de fundamentação completa afronta os princípios do contraditório e da ampla defesa.

Senhores Julgadores,
Este caso ilustra de maneira clara a interdependência entre o Direito do Trabalho e o Direito Previdenciário: o reconhecimento da relação de trabalho, ainda que informal, garante ao trabalhador não apenas direitos trabalhistas, mas também o acesso à proteção previdenciária.
Assim, pugno pela acolhida do presente Incidente, para que esta Turma Nacional de Uniformização:
Uniformize a interpretação no sentido da admissibilidade da prova exclusivamente testemunhal;
Reconheça a possibilidade de execução provisória;
Determine a necessidade de fundamentação plena das decisões.
Por fim, pede-se a consequente reforma do acórdão recorrido, com o reconhecimento do tempo de serviço pleiteado e a garantia do direito à execução provisória.
Muito obrigado.
"""

# Criar o objeto de texto para fala
tts = gTTS(text=texto, lang='pt-br')

# Salvar o áudio
tts.save("sustentacao_oral.mp3")

print("Áudio gerado com sucesso! Arquivo: sustentacao_oral.mp3")
