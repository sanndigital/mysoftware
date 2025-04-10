# Mock generator for now – replace this with Stable Diffusion or DALL·E
from PIL import Image, ImageDraw, ImageFont
import sys

prompt = sys.argv[1]
filename = sys.argv[2]

# Create simple image
img = Image.new('RGB', (800, 400), color=(73, 109, 137))
d = ImageDraw.Draw(img)
d.text((10, 10), prompt, fill=(255, 255, 0))
img.save(filename)
