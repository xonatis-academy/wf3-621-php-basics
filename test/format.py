groups = {0: [('Sandra Ferrero', 17.099999999999998, 18.0),
              ('Yasmina Ardhaoui', 10.35, 9.0),
              ('Rachida Khatoubi', 15.6, 15.0),
              ('Hawa Siby', 12.254999999999999, 12.3),
              ('moyenne', 13.575)],
          1: [('Nadia Elakeb bensaoula', 16.955, 17.3),
              ('Ilham Dif', 10.66, 10.6),
              ('Samia Litim', 14.555000000000001, 14.3),
              ('Gordana Grujicic', 12.6, 12.0),
              ('moyenne', 13.55)],
          2: [('Jennifer Bouhid', 16.810000000000002, 16.6),
              ('Sandrine Nouar', 11.36, 11.6),
              ('Intidhar Ben mrad', 13.55, 14.0),
              ('Céline Claret', 13.149999999999999, 13.0),
              ('moyenne', 13.8)],
          3: [('Sana Aroua', 16.099999999999998, 17.0),
              ('Fadia Sebiane', 11.399999999999999, 12.0),
              ('Erika Rapson', 13.95, 15.0),
              ('Sabrine Lassadi sghaier', 13.254999999999999, 13.3),
              ('moyenne', 14.325)],
          4: [('Sandrine Parfait', 15.95, 17.0),
              ('Christelle Kabiena', 11.549999999999999, 12.0),
              ('Carole Sainsard', 14.45, 14.0),
              ('moyenne', 14.333333333333334)]}

for index in groups:
    print(f'Groupe #{index + 1} :')
    for note in groups[index]:
        if note[0] == 'moyenne':
            continue
        print(f'- {note[0]}')
    print()