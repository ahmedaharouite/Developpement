# Generated by Django 2.1.3 on 2019-01-20 17:19

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('base', '0016_grouptype_department'),
    ]

    operations = [
        migrations.AlterUniqueTogether(
            name='edtversion',
            unique_together={('department', 'semaine', 'an')},
        ),
    ]
