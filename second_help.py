import matplotlib.pyplot as plt
import csv

folder_path = '\\xampp\\htdocs\\HHO\\charts\\'

total = []
with open('C:\\xampp\\htdocs\\HHO\\second_helped.csv', 'r') as file:
    reader = csv.reader(file)
    for row in reader:
        total.append(float(row[0]))  # Convert string to float
tot = total[0]
x = total[1]
percentage = (x / tot) * 100
remaining = 100 - percentage

labels = ['Donation', 'Remaining']
sizes = [percentage, remaining]
colors = ['#ff9999', '#66b3ff']

plt.pie(sizes, labels=labels, colors=colors, autopct='%1.1f%%', startangle=120)
plt.title('Percentage Pie Chart')
plt.savefig(folder_path + 'help2.png')
plt.close()
