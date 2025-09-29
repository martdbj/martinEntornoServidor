
public class Test {

    public static void main(String[] args) {
        long n = 999L; 
        Long N = n;
        String number = N.toString();
        char[] numberArr = number.toCharArray();
        int total = 1;
        int counter = 0;
        if (n < 10) {
            total = 0;
        }

        if (total > 9) {
            for (char c : numberArr) {
            total *= c;
            counter++;
        }
        }
        System.out.println(counter);
    }
}
