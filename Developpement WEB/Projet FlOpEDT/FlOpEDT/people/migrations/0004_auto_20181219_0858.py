# Generated by Django 2.1.2 on 2018-12-19 08:58

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('people', '0003_auto_20181129_1019'),
    ]

    operations = [
        migrations.AlterModelOptions(
            name='user',
            options={'ordering': ['username']},
        ),
    ]
