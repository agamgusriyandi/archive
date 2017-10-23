# Updated: 2017-10-23
import telebot
TOKEN = 'YOUR_TOKEN'
bot = telebot.TeleBot(TOKEN)

@bot.message_handler(commands=['start'])
def start(message):
    bot.reply_to(message, 'Hello!')

bot.polling()