import subprocess
import re
import urllib.request
import urllib.parse
import time

lastTitle = ''

def logCurrentlyPlaying():
  try:
    global lastTitle

    m3u3URL = "http://itsliveradiobackup.apple.com/streams/hub02/session02/64k/prog.m3u8"
    m3u3 = str(urllib.request.urlopen(m3u3URL).read())
    aacEndings = re.findall(r',\\n' + '(.*?c)', m3u3)

    aacURL = "http://itsliveradiobackup.apple.com/streams/hub02/session02/64k/" + aacEndings[-1]
    metadata = subprocess.check_output('ffmpeg -loglevel quiet -y -i {0} -f ffmetadata pipe:1'.format(aacURL), shell=True).decode()

    title = re.search('title=(.*?)\\n', metadata).group(1)

    if re.search('artist=(.*?)\\n', metadata):
        artist = re.search('artist=(.*?)\\n', metadata).group(1)
    else:
        print('No artist; skipping\n')
        return

    if artist in ['Zane Lowe', 'Julie Adenuga', 'News', 'Ebro Darden', 'Charli XCX']:
        print('Beats 1 host; skipping\n')
        return

    if re.search('album=(.*?)\\n', metadata):
        album = re.search('album=(.*?)\\n', metadata).group(1)
    else:
        album = 'None'

    if lastTitle == title:
        print(title + ' already logged; skipping\n')
        return

    artworkSearchURL = 'https://itunes.apple.com/search?' + urllib.parse.urlencode({'term' : '{0} {1} {2}'.format(title, artist, album), 'limit' : 1})
    apiResponse = str(urllib.request.urlopen(artworkSearchURL).read())
    if re.search('artworkUrl100":"(.*?)100x100bb.jpg"', apiResponse):
        artwork = re.search('artworkUrl100":"(.*?)100x100bb.jpg"', apiResponse).group(1) + '500x500bb.jpg'
    else:
        artwork = 'https://d30j0ipo6imng1.cloudfront.net/static/images/features/listen/album-placeholder.f97c23852f00.png'

    logResponse = urllib.request.urlopen('http://exzackly7.com/Beats1Tracker/logSong.php?' + urllib.parse.urlencode({'title' : title, 'artist' : artist, 'album' : album, 'artwork' : artwork})).read().decode('utf-8') 
    if logResponse == 'Song logged':
        print(title + ' by ' + artist + ' from ' + album + ' logged\n')
        lastTitle = title
    else:
        print(logResponse + '\n')
        print('Error: ' + title + ' by ' + artist + ' from ' + album + ' could not be logged\n')

  except Exception as e:
    print('Error: ' + str(e) + '\n')

while True:
    logCurrentlyPlaying()
    time.sleep(15)
