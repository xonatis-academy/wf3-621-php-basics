notes = '''
Sandrine Nouar - 11.6 - 10
Rachida Khatoubi - 15 - 19
Jennifer Bouhid - 16.6 - 18
Gordana Grujicic - 12 - 16
Intidhar Ben mrad - 14 - 11
Nadia Elakeb bensaoula - 17.3 - 15
Yasmina Ardhaoui - 9 - 18
Samia Litim - 14.3 - 16
Sandrine Parfait - 17 - 10
Ilham Dif - 10.6 - 11
Sabrine Lassadi sghaier - 13.3 - 13
Sana Aroua - 17 - 11
Christelle Kabiena - 12 - 9
Carole Sainsard - 14 - 17
Erika Rapson - 15 - 8
Hawa Siby - 12.3 - 12
Sandra Ferrero - 18 - 12
Fadia Sebiane - 12 - 8
Céline Claret - 13 - 14
'''

pnotes = []
for line in notes.split("\n"):
    line = line.strip()
    if line == '':
        continue
    cols = line.split(' - ')
    pnotes.append((cols[0], 0.85 * float(cols[1]) + 0.15 * float(cols[2]), float(cols[1])))
pnotes = sorted(pnotes, key=lambda x: x[1], reverse=True)

from pprint import pprint
pprint(pnotes)

groups = dict()
for i in range(5):
    groups[i] = []
while len(pnotes) > 0:
    for i in range(5):
        if len(pnotes) > 0:
            groups[i].append(pnotes[0])
            del pnotes[0]
        if len(pnotes) > 0:
            groups[i].append(pnotes[-1])
            del pnotes[-1]

for i in range(5):
    mean = float(sum([x[2] for x in groups[i]])) / len(groups[i])
    groups[i].append(('moyenne', mean))
pprint(groups)
    