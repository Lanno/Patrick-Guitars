import os
import re

from django.conf import settings
from django.shortcuts import render

def index(request):
	extensions = ['jpg', 'jpeg', 'png']

	filenames = []
	for filename in os.listdir(os.path.join(settings.BASE_DIR, 'patricks_guitars/static/gallery')):
		if re.search(r'.*(jpg|jpeg|png)$', filename, re.IGNORECASE):
			filenames.append(filename)

	return render(request, 'index.html', {'gallery_filenames': filenames})
