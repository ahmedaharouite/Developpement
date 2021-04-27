# Generated by Django 2.1.2 on 2018-11-29 10:19

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('people', '0002_tutor_departments'),
    ]

    operations = [
        migrations.AlterModelOptions(
            name='biatos',
            options={'verbose_name': 'BIATOS'},
        ),
        migrations.AlterModelOptions(
            name='fullstaff',
            options={'verbose_name': 'FullStaff'},
        ),
        migrations.AlterModelOptions(
            name='supplystaff',
            options={'verbose_name': 'SupplyStaff'},
        ),
        migrations.AlterField(
            model_name='fullstaff',
            name='department',
            field=models.CharField(blank=True, default='INFO', max_length=50, null=True),
        ),
    ]
