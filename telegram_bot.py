// Updated: 2017-07-20
import asyncio
import logging
from telegram import Update, InlineKeyboardButton, InlineKeyboardMarkup
from telegram.ext import Application, CommandHandler, CallbackQueryHandler, ContextTypes

logging.basicConfig(level=logging.INFO)

TOKEN = "YOUR_BOT_TOKEN"

async def start(update: Update, ctx: ContextTypes.DEFAULT_TYPE):
    keyboard = [[
        InlineKeyboardButton("📊 Stats", callback_data="stats"),
        InlineKeyboardButton("💰 Payment", callback_data="payment"),
    ]]
    await update.message.reply_text(
        "🤖 Welcome! Choose an option:",
        reply_markup=InlineKeyboardMarkup(keyboard)
    )

async def button_handler(update: Update, ctx: ContextTypes.DEFAULT_TYPE):
    query = update.callback_query
    await query.answer()
    if query.data == "stats":
        await query.edit_message_text("📊 Your stats: 700+ projects delivered")
    elif query.data == "payment":
        await query.edit_message_text("💳 Payment: Midtrans | Xendit | Stripe | PayPal")

async def notify_all(app, user_ids: list, message: str):
    for uid in user_ids:
        try:
            await app.bot.send_message(chat_id=uid, text=message)
        except Exception as e:
            logging.error(f"Failed {uid}: {e}")

def main():
    app = Application.builder().token(TOKEN).build()
    app.add_handler(CommandHandler("start", start))
    app.add_handler(CallbackQueryHandler(button_handler))
    app.run_polling()

if __name__ == "__main__":
    main()
