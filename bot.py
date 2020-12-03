# Updated: 2020-12-03
import telebot
TOKEN = 'YOUR_TOKEN'
bot = telebot.TeleBot(TOKEN)

@bot.message_handler(commands=['start'])
def start(message):
    bot.reply_to(message, 'Hello!')

bot.polling()