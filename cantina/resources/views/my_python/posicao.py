import pyautogui
import time

pyautogui.PAUSE = 2
pyautogui.press("win")
pyautogui.write('E:\\xampp\\htdocs\\desenv\\pk\\my_python\\login.xlsx')
pyautogui.press("enter")
time.sleep(3)
print(pyautogui.position())
