import pyautogui
import time

pyautogui.PAUSE = 2

# Abrir a Ferramenta / oSistema / o Programa
pyautogui.press("win")
pyautogui.write('E:\\xampp\\htdocs\\desenv\\pk\\my_python\\login.xlsx')
pyautogui.press("backspace")
pyautogui.press("enter")
# preenche login
pyautogui.click(x=362, y=314)
pyautogui.write("edmilson")
# preenche a senha
pyautogui.click(x=418, y=364)
pyautogui.write("123456789")
# clicar em fazer login
pyautogui.click(x=575, y=469)

