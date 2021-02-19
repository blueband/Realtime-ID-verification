Create a dictionary with words and word frequencies that can be passed to the generate_from_frequencies function of the WordCloud class.

Once you have the dictionary, use this code to generate the word cloud image:


cloud = wordcloud.WordCloud()
cloud.generate_from_frequencies(frequencies)
cloud.to_file("myfile.jpg")