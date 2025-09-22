
public class Test {

    public static void main(String[] args) {
        int var = 5;

        for (int i = 0; i < var; i++) {
            for (int j = var; j >= i; j--) {
                System.out.print("&");
            }
            for (int j = 0; j <= i; j++) {
                System.out.print("*");
            }
            System.out.println("");
        }
    }
}
