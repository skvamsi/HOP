import csv
import matplotlib.pyplot as plt

folder_path = '\\xampp\\htdocs\\HHO\\charts\\'
categories = []
values = []
with open('C:\\xampp\\htdocs\\HHO\\bar_charts.csv', 'r') as file:
    reader = csv.reader(file)
    for row in reader:
        categories.append(row[0])
        values.append(int(row[1]))

# Generate bar chart
plt.bar(categories, values)
plt.xlabel('years')
plt.ylabel('Donation')
plt.title('Three Years Donation Status')
plt.savefig(folder_path + 'bar.png')
plt.close()  # Close the plot to prevent displaying it