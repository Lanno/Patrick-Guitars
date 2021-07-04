import os
import re

from django.conf import settings
from django.shortcuts import render

def index(request):
	extensions = ['jpg', 'jpeg', 'png']

	gallery_dir = os.path.join(settings.BASE_DIR, 'patrick_guitars/static/gallery')

	filenames = []
	for filename in os.listdir(gallery_dir):
		if re.search(r'.*(jpg|jpeg|png)$', filename, re.IGNORECASE):
			filenames.append(filename)

	return render(request, 'index.html', {'gallery_filenames': filenames})
