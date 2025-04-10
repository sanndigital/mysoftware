from PIL import Image, ImageDraw, ImageFont
import sys
import os

prompt = sys.argv[1]
filename = sys.argv[2]

img = Image.new('RGB', (800, 400), color=(40, 50, 60))
d = ImageDraw.Draw(img)

# Use system font or fallback
try:
    font = ImageFont.truetype("arial.ttf", 28)
except:
    font = ImageFont.load_default()

d.text((30, 180), f"AI Generated: {prompt}", font=font, fill=(255, 255, 255))
img.save(filename)
