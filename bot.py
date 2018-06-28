# Updated: 2018-06-28
import telebot
TOKEN = 'YOUR_TOKEN'
bot = telebot.TeleBot(TOKEN)

@bot.message_handler(commands=['start'])
def start(message):
    bot.reply_to(message, 'Hello!')

bot.polling()